import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter_cube/widget/friendbox.dart';
import 'package:http/http.dart';

class FriendPage extends StatefulWidget {
  final String token;
  const FriendPage({Key? key, required this.token}) : super(key: key);

  @override
  _FriendPageState createState() => _FriendPageState();
}

class _FriendPageState extends State<FriendPage> {
  Color mainBlue = const Color(0xff03989e);
  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
  var friends = [];
  String url = "http://10.0.2.2:8000/api/relations";

  Future<List> fetchFriends() async {
    late final List jsonData;
    var response = await get(Uri.parse(url), headers: {
      "Accept": "application/json",
      "Authorization": "Bearer ${widget.token}"
    }).then((value) {
      jsonData = json.decode(value.body);
    });
    return jsonData;
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
        title: const Text('Mes relations'),
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
      body: FutureBuilder<List>(future: fetchFriends(), builder: (context, snapshot) {
        if(snapshot.hasData) {
          print(snapshot.data);
          return SingleChildScrollView(
              child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Column(
                    children: [
                      for (var friend in snapshot.data!) FriendBox(relation: friend, token: widget.token)
                    ],
                  )));
        }
        return const Center(child: CircularProgressIndicator(),);
      })
    );
  }
}

