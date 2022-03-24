import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter_cube/widget/feedbox.dart';
import 'package:flutter_cube/widget/friendbox.dart';
import 'package:http/http.dart';

class LikedPostPage extends StatefulWidget {
  final String token;
  const LikedPostPage({Key? key, required this.token}) : super(key: key);

  @override
  _LikedPostPage createState() => _LikedPostPage();
}

class _LikedPostPage extends State<LikedPostPage> {
  Color mainBlue = const Color(0xff03989e);
  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
  var posts = [];
  String url = 'http://10.0.2.2/api/mon-compte/ressources?favoris=true&partagees=true&mise_de_cote=true';

  Future<void> fetchFriends() async {
    var response = await get(Uri.parse(url), headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
      "Accept": "application/json",
      'Authorization': 'Bearer ${widget.token}',
    }).then((value) {
      setState(() {
        print(widget.token);
        posts = jsonDecode(value.body);
        print(posts);
      });
    });
  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    fetchFriends();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: bgBlue,
      appBar: AppBar(
        title: const Text('Favoris'),
        centerTitle: true,
        backgroundColor: mainBlue,
        /*actions: [
          IconButton(
              onPressed: () {
                Navigator.of(context).push(MaterialPageRoute(
                  builder: (context) => NewResourcePage(user: widget.user),
                ));
              },
              icon: const Icon(Icons.add))
        ],*/
      ),
      body: SingleChildScrollView(
          child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: Column(
                children: [
                  for (var post in posts) FeedBox(ressource: post)
                ],
              ))),
    );
  }
}

