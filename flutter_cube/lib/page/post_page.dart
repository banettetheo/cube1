import 'dart:convert';
import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/page/new_resource_page.dart';
import 'package:flutter_cube/widget/feedbox.dart';
import 'package:http/http.dart';

class PostPage extends StatefulWidget {
  final User user;
  var posts = [];

  PostPage({
    Key? key,
    required this.user,
  }) : super(key: key);

  @override
  _PostPageState createState() => _PostPageState();
}

class _PostPageState extends State<PostPage> {
  final urlPosts = "http://10.0.2.2:8000/api/ressources";
  Color mainBlue = const Color(0xff03989e);
  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);

  void fetchPosts() async {
    try {
      final response = await get(Uri.parse(urlPosts));
      final jsonData = jsonDecode(response.body);

      setState(() {
        widget.posts = jsonData;
        inspect(widget.posts);
      });
    } catch (e) {
      inspect(e);
    }
  }

  @override
  void initState() {
    super.initState();
    fetchPosts();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: bgBlue,
      appBar: AppBar(
        title: const Text('Mes publications'),
        centerTitle: true,
        backgroundColor: mainBlue,
        actions: [
          IconButton(
              onPressed: () {
                Navigator.of(context).push(MaterialPageRoute(
                  builder: (context) => NewResourcePage(user: widget.user),
                ));
              },
              icon: const Icon(Icons.add))
        ],
      ),
      body: SingleChildScrollView(
          child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: Column(
                children: [
                  for (var post in widget.posts) FeedBox(ressource: post)
                ],
              ))),
    );
  }
}
