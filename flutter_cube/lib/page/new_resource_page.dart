import 'dart:convert';
import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/page/post_page.dart';
import 'package:flutter_cube/widget/dropdownitem.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';
import 'package:http/http.dart';

class NewResourcePage extends StatefulWidget {
  final String token;
  final int userId;

  const NewResourcePage({
    Key? key,
    required this.token,
    required this.userId
  }) : super(key: key);

  @override
  _NewResourcePageState createState() => _NewResourcePageState();
}

class _NewResourcePageState extends State<NewResourcePage> {
  late int categorie;
  late int type;
  late String titre;
  late String contenu;
  final urlCat = "http://10.0.2.2:8000/api/categories";
  final urlTypes = "http://10.0.2.2:8000/api/types-ressources";
  final urlPost = "http://10.0.2.2:8000/api/ressources";
  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
  Color mainBlue = const Color(0xff03989e);

  Future<List> fetchCategories() async {
    late final List jsonData;
    final response = await get(Uri.parse(urlCat)).then((value) => jsonData = jsonDecode(value.body));
    return jsonData;
  }

  Future<List> fetchTypes() async {
    late final List jsonData;
    final response = await get(Uri.parse(urlTypes)).then((value) => jsonData = jsonDecode(value.body));
    return jsonData;
  }

  Future<void> postData() async {
    final response = await post(Uri.parse(urlPost), headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
      "Accept": "application/json",
      "Authorization": "Bearer ${widget.token}"
    },
    body: {
      "Titre": titre,
      "Contenue": contenu,
      "IdCategorie": categorie.toString(),
      "IdUtilisateur_createur": widget.userId.toString(),
      "IdType": type.toString(),
      "Lien_ressources": "https://i.ytimg.com/vi/NBYPchPY8-g/maxresdefault.jpg",
    }).then((value) {
      print('jij');
    });
  }

  @override
  void initState() {
    fetchCategories();
    fetchTypes();
    super.initState();
  }

  @override
  Widget build(BuildContext context) => Scaffold(
        backgroundColor: bgBlue,
        appBar: AppBar(
          leading: IconButton(
            icon: const Icon(Icons.arrow_back, color: Colors.black),
            onPressed: () => Navigator.pushReplacement(
              context,
              MaterialPageRoute (
                builder: (BuildContext context) => PostPage(token: widget.token, userId: widget.userId),
              ),
            ),
          ),
          title: const Text('Nouvelle publication'),
          centerTitle: true,
          backgroundColor: mainBlue,
        ),
        body: ListView(
          padding: const EdgeInsets.symmetric(horizontal: 25.0),
          physics: const BouncingScrollPhysics(),
          children: [
            const SizedBox(height: 24),
            TextFieldWidget(
                label: "Titre de la ressource",
                text: "",
                maxLines: 1,
                onChanged: (title) {
                  setState(() {
                    titre = title;
                    print(titre);
                  });
                }),
            const SizedBox(height: 24),
            FutureBuilder<List>(future: fetchCategories(), builder: (context, snapshot) {
              if (snapshot.hasData) {
                return DropdownItemWidget(data: snapshot.data!, onChanged: (categoryObj) {
                  setState(() {
                    categorie = int.parse(categoryObj.toString());
                    print(categorie);
                  });
                },);
              } else {
                return const Text("nul germain nul!");
              }
            }),
            const SizedBox(height: 24),
            FutureBuilder<List>(future: fetchTypes(), builder: (context, snapshot) {
              if (snapshot.hasData) {
                return DropdownItemWidget(data: snapshot.data!, onChanged: (typeObj) {
                  setState(() {
                    type = int.parse(typeObj.toString());
                    print(type);
                  });
                },);
              }
              return const Text("nul germain nul!");
            }),
            const SizedBox(height: 24),
            TextFieldWidget(
                label: "Contenu de la ressource",
                text: "",
                maxLines: 5,
                onChanged: (content) {
                  setState(() {
                    contenu = content;
                    print(contenu);
                  });
                }),
            const SizedBox(height: 24),
            ElevatedButton(
              style: ElevatedButton.styleFrom(
                  shape: const StadiumBorder(),
                  onPrimary: Colors.white,
                  primary: mainBlue),
              onPressed: () {
                FutureBuilder(future: postData(),builder: (context, snapshot) {
                  if (snapshot.hasData) {
                    Navigator.of(context).push(MaterialPageRoute(
                      builder: (context) => PostPage(token: widget.token, userId: widget.userId),
                    ));
                  }
                  return const AlertDialog(
                    title: Text("Chargement..."),
                    content: CircularProgressIndicator(),
                  );
                });
              },
              child: const Text("Sauvegarder la ressource"),
            ),
          ],
        ),
      );
}
