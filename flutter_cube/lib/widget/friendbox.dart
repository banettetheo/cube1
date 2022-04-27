import 'dart:convert';
import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/page/friends_page.dart';
import 'package:http/http.dart';
import 'actionbtn.dart';

class FriendBox extends StatelessWidget {
  final relation;
  final String token;
  const FriendBox({Key? key, required this.relation, required this.token}) : super(key: key);

  Future<void> deleteFriend() async {
    String url = "http://10.0.2.2:8000/api/relations/${relation["id"]}";
    var response = await delete(Uri.parse(url), headers: {
      "Accept": "application/json",
      "Authorization": "Bearer ${token}"
    });
  }

  @override
  Widget build(BuildContext context) {
    Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
    Color mainBlue = const Color(0xff03989e);
    return Container(
        margin: const EdgeInsets.only(bottom: 20.0),
        width: double.infinity,
        decoration: BoxDecoration(
          borderRadius: BorderRadius.circular(12.0),
          color: mainBlue,
        ),
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: Column(
            children: [
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Column(
                    children: [
                      const SizedBox(
                        height: 10.0,
                      ),
                      Text(
                        relation["utilisateur"]["name"],
                        style: const TextStyle(color: Colors.white, fontSize: 16.0),
                      ),
                      const SizedBox(
                        height: 10.0,
                      ),
                      Text(
                        relation["utilisateur"]["Prenom"],
                        style: const TextStyle(color: Colors.white, fontSize: 16.0),
                      ),
                    ],
                  ),
                  const SizedBox(
                    width: 20.0,
                  ),
                  Column(
                    children: [
                      Text("Relation : ${relation["typeRelation"]["Nom"]}", style: const TextStyle(color: Colors.white, fontSize: 16.0),)
                    ],
                  )
                ],
              ),
              const Divider(
                thickness: 1.5,
                color: Color(0xFF505050),
              ),
              Row(
                children: [
                  ActionButton(icon: Icons.delete, actionTitle: "Supprimer", iconColor: const Color(0xFF505050),
                          onClicked: () {
                        deleteFriend();
                        Navigator.pushReplacement(
                          context,
                          MaterialPageRoute (
                            builder: (BuildContext context) => FriendPage(token: token),
                          ),
                        );
                      }),
                  ActionButton(icon: Icons.account_box, actionTitle: "Afficher", iconColor: const Color(0xFF505050),
                          onClicked: () {
                        print("jouj");
                      }),
                ],
              )
            ],
          ),
        ));
  }
}
