import 'dart:convert';
import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/widget/dropdownitem.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';
import 'package:http/http.dart';

class NewResourcePage extends StatefulWidget {
  final User user;
  var _categories = [];
  var _types = [];

  NewResourcePage({
    Key? key,
    required this.user,
  }) : super(key: key);

  @override
  _NewResourcePageState createState() => _NewResourcePageState();
}

class _NewResourcePageState extends State<NewResourcePage> {
  final urlCat = "http://10.0.2.2:8000/api/categories";
  final urlTypes = "http://10.0.2.2:8000/api/types-ressource";
  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
  Color mainBlue = const Color(0xff03989e);

  void fetchCategories() async {
    try {
      final response = await get(Uri.parse(urlCat));
      final jsonData = jsonDecode(response.body);

      setState(() {
        widget._categories = jsonData;
        inspect(widget._categories);
      });
    } catch (e) {
      inspect(e);
    }
  }

  void fetchTypes() async {
    try {
      final response = await get(Uri.parse(urlTypes));
      final jsonData = jsonDecode(response.body);

      setState(() {
        widget._types = jsonData;
        inspect(widget._types);
      });
    } catch (e) {
      inspect(e);
    }
  }

  @override
  void initState() {
    super.initState();
    fetchCategories();
    fetchTypes();
  }

  @override
  Widget build(BuildContext context) => Scaffold(
        backgroundColor: bgBlue,
        appBar: AppBar(
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
                onChanged: (name) {}),
            const SizedBox(height: 24),
            DropdownItemWidget(data: widget._categories),
            const SizedBox(height: 24),
            DropdownItemWidget(data: widget._types),
            const SizedBox(height: 24),
            TextFieldWidget(
                label: "Contenu de la ressource",
                text: "",
                maxLines: 5,
                onChanged: (about) {}),
            const SizedBox(height: 24),
            ElevatedButton(
              style: ElevatedButton.styleFrom(
                  shape: StadiumBorder(),
                  onPrimary: Colors.white,
                  primary: mainBlue),
              onPressed: () {},
              child: Text("Sauvegarder la ressource"),
            ),
          ],
        ),
      );
}
