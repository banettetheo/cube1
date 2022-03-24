// Copyright 2018 The Flutter team. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

import 'dart:convert';
import 'dart:developer';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:flutter_cube/widget/feedbox.dart';
import 'package:flutter_cube/widget/navigation_widget_drawer.dart';
import 'package:http/http.dart';

import 'model/user.dart';

void main() {
  runApp(MyApp());
}

// #docregion MyApp
class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
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
  late final Future<Map<String, dynamic>> response = fetchAuth();
  var _feed = [];
  final url = "http://10.0.2.2:8000/api/login";
  final url2 = "http://10.0.2.2:8000/api/ressources";

  Future<Map<String, dynamic>> fetchAuth() async {
    try{
      SharedPreferences prefs = await SharedPreferences.getInstance();
      var json;
      var response = await post(Uri.parse(url), headers: {
        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        "Accept": "application/json"
      }, body: {
        "email": prefs.getString('usernameCube') ?? '0',
        "password": prefs.getString('passwordCube') ?? '0'
      }).then((value) {
        json = jsonDecode(value.body);
      });
      return json;
    } catch(e) {
      String err = '''
      {
        "erreur": "La requete n'est pas arrivée à son terme!",
      }''';
      return jsonDecode(err);
    }
  }

  Future<void> fetchFeed() async {
      try {
        final response = await get(Uri.parse(url2));
        final jsonData = jsonDecode(response.body);

        setState(() {
          _feed = jsonData;
          inspect(_feed);
        });
      } catch (e) {
        inspect(e);
      }
  }

  @override
  void initState() {
    fetchFeed();
    super.initState();
  }

  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
  Color mainBlue = const Color(0xff03989e);
  Color cubeBlue = const Color(0xFF2D88FF);
  Color mainGrey = const Color(0xFF505050);

  @override
  Widget build(BuildContext context) {
    return FutureBuilder<Map<String, dynamic>>(future: response, builder: (context, snapshot) {
        return Scaffold(
            backgroundColor: bgBlue,
            drawer: NavigationDrawer(data: snapshot.data!),
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
                    for (var post in _feed)
                      FeedBox(
                        ressource: post,
                      )
                  ],
                ),
              ),
            ));
    });
  }
}
