// Copyright 2018 The Flutter team. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

import 'package:english_words/english_words.dart';
import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/widget/feedbox.dart';
import 'package:flutter_cube/widget/navigation_widget_drawer.dart';
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
  final User user = const User(
      imagePath:
          "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
      name: "Théo",
      email: "theobanette@icloud.com",
      about: "Giga bg de la street tu coco",
      isDarkMode: false);
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  Color bgBlack = Color(0xFF1a1a1a);
  Color mainBlack = Color(0xFF262626);
  Color cubeBlue = Color(0xFF2D88FF);
  Color mainGrey = Color(0xFF505050);

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
        backgroundColor: bgBlack,
        drawer: NavigationWidgetDrawer(user: widget.user),
        appBar: AppBar(
          elevation: 0.0,
          backgroundColor: mainBlack,
          title: Text(
            "(Re)sources Relationnelles",
            style: TextStyle(
              color: cubeBlue,
            ),
          ),
          actions: [
            IconButton(
              onPressed: () {},
              icon: Icon(Icons.search),
            ),
          ],
        ),
        body: SingleChildScrollView(
          child: Padding(
            padding: EdgeInsets.all(8.0),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                SizedBox(
                  height: 20.0,
                ),
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
