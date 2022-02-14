// Copyright 2018 The Flutter team. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

import 'package:english_words/english_words.dart';
import 'package:flutter/material.dart';
import 'package:flutter_cube/widget/feedbox.dart';
import 'package:flutter_cube/widget/navigation_drawer_widget.dart';
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
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  Color bgBlack = Color(0xFF1a1a1a);
  Color mainBlack = Color(0xFF262626);
  Color cubeBlue = Color(0xFF2D88FF);
  Color mainGrey = Color(0xFF505050);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: bgBlack,
        drawer: NavigationWidgetDrawer(),
        appBar: AppBar(
          elevation: 0.0,
          backgroundColor: mainBlack,
          title: Text(
            "Ressources Humaines",
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
                Container(
                    width: double.infinity,
                    decoration: BoxDecoration(
                      color: mainBlack,
                      borderRadius: BorderRadius.circular(12.0),
                    ),
                    child: Padding(
                      padding: const EdgeInsets.symmetric(
                          horizontal: 8.0, vertical: 10.0),
                      child: Column(
                        children: [
                          Row(
                            children: [
                              CircleAvatar(
                                radius: 25.0,
                                backgroundImage: NetworkImage(
                                    "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"),
                              ),
                              SizedBox(
                                width: 10.0,
                              ),
                              Expanded(
                                  child: TextField(
                                style: TextStyle(
                                  color: Colors.white,
                                ),
                                decoration: InputDecoration(
                                    contentPadding: EdgeInsets.only(left: 25.0),
                                    hintText: "Post Something...",
                                    filled: true,
                                    fillColor: mainGrey,
                                    border: OutlineInputBorder(
                                        borderRadius:
                                            BorderRadius.circular(30.0),
                                        borderSide: BorderSide.none)),
                              )),
                            ],
                          ),
                          SizedBox(
                            height: 10.0,
                          ),
                          Divider(
                            thickness: 1.5,
                            color: Color(0xFF505050),
                          ),
                          Row(
                            children: [
                              actionButton(
                                  Icons.thumb_up, "Aimer", Color(0xFF505050)),
                              actionButton(
                                  Icons.comment, "Comment", Color(0xFF505050)),
                              actionButton(
                                  Icons.share, "Partager", Color(0xFF505050)),
                            ],
                          )
                        ],
                      ),
                    )),
                SizedBox(
                  height: 20.0,
                ),
                feedBox(
                    "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
                    "Théo_Cube",
                    "6 min",
                    "Un essaie wola",
                    "")
              ],
            ),
          ),
        ));
  }
}
