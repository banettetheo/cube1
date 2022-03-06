// Copyright 2018 The Flutter team. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

import 'dart:convert';
import 'dart:developer';
import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:flutter_cube/widget/feedbox.dart';
import 'package:flutter_cube/widget/navigation_widget_drawer.dart';
import 'package:http/http.dart';
import 'widget/actionbtn.dart';

void main() {
  runApp(MyApp());
}

// #docregion MyApp
class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: '(RES)SOURCES Flutter UI',
      debugShowCheckedModeBanner: false,
      home: HomePage(),
    );
  }
  // #enddocregion build
}
// #enddocregion MyApp

class HomePage extends StatefulWidget {
  var _userJson = [];

  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final url = "https://jsonplaceholder.typicode.com/posts";

  void fetchUser() async {
    try {
      SharedPreferences prefs = await SharedPreferences.getInstance();
      //prefs.setString('usernameCube', 'theo');
      //prefs.setString('passwordCube', 'banette');

      if (widget._userJson.isNotEmpty) {
        inspect("jij");
      }

      final response = await get(Uri.parse(url));
      final jsonData = jsonDecode(response.body);

      setState(() {
        var username = prefs.getString("usernameCube");
        var password = prefs.getString("passwordCube");
        widget._userJson = jsonData;
        if (widget._userJson.isNotEmpty) {
          inspect(username);
          inspect(password);
        }
      });
    } catch (e) {
      inspect(e);
    }
  }

  @override
  void initState() {
    super.initState();
    fetchUser();
  }

  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
  Color mainBlue = const Color(0xff03989e);
  Color cubeBlue = const Color(0xFF2D88FF);
  Color mainGrey = const Color(0xFF505050);

  var feed = [
    {
      "avatarUrl":
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
      "username": "Théo",
      "date": "maintenant",
      "description": "du jij",
      "image":
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"
    },
    {
      "avatarUrl":
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
      "username": "Théo",
      "date": "maintenant",
      "description": "du jij",
      "image":
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"
    },
    {
      "avatarUrl":
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
      "username": "Théo",
      "date": "maintenant",
      "description": "du jij",
      "image":
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"
    },
    {
      "avatarUrl":
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
      "username": "Théo",
      "date": "maintenant",
      "description": "du jij",
      "image":
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"
    },
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: bgBlue,
        drawer: NavigationDrawer(data: widget._userJson),
        appBar: AppBar(
          elevation: 0.0,
          backgroundColor: mainBlue,
          title: const Image(
            image: NetworkImage(
                "https://cdn.discordapp.com/attachments/870209678192304169/948980643285577738/unknown.png",
                scale: 3),
          ),
          actions: [
            IconButton(
              onPressed: () {},
              icon: const Icon(Icons.search),
            ),
          ],
        ),
        body: SingleChildScrollView(
          child: Padding(
            padding: const EdgeInsets.all(12.0),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                for (var post in feed)
                  feedBox(
                      post["avatarUrl"].toString(),
                      post["username"].toString(),
                      post["date"].toString(),
                      post["description"].toString(),
                      post["image"].toString())
              ],
            ),
          ),
        ));
  }
}
