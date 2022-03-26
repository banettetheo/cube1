import 'dart:convert';
import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/page/new_resource_page.dart';
import 'package:flutter_cube/widget/feedbox.dart';
import 'package:http/http.dart';

class PostPage extends StatefulWidget {
  final String token;
  final int userId;

  const PostPage({
    Key? key,
    required this.token,
    required this.userId
  }) : super(key: key);

  @override
  _PostPageState createState() => _PostPageState();
}

class _PostPageState extends State<PostPage> {
  final urlPosts = "http://10.0.2.2:8000/api/mon-compte/ressources";
  Color mainBlue = const Color(0xff03989e);
  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);

  Future<List> fetchPosts() async {
    late final List jsonData;
    final response = await get(Uri.parse(urlPosts), headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
      "Accept": "application/json",
      "Authorization": "Bearer ${widget.token}"
    }).then((value) {
      jsonData = jsonDecode(value.body);
    });
    return jsonData;
  }

  @override
  void initState() {
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return FutureBuilder<List>(future: fetchPosts(), builder: (context, snapshot) {
      if (snapshot.hasData) {
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
                      builder: (context) => NewResourcePage(token: widget.token, userId: widget.userId,),
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
                      for (var post in snapshot.data!) FeedBox(ressource: post)
                    ],
                  ))),
        );
      }
      return Scaffold(
          backgroundColor: bgBlue,
          appBar: AppBar(
            title: const Text('Mes publications'),
            centerTitle: true,
            backgroundColor: mainBlue,
          ),
          body: const Center(child: CircularProgressIndicator(),)
      );
    });
  }
}
