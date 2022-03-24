import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/widget/comment_widget.dart';
import 'actionbtn.dart';

class FriendBox extends StatelessWidget {
  final relation;
  const FriendBox({Key? key, required this.relation}) : super(key: key);

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
                children: [
                  Expanded(
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.start,
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(relation["name"],
                              style: const TextStyle(
                                color: Colors.black,
                                fontSize: 18.0,
                                fontWeight: FontWeight.w600,
                              )),
                          const SizedBox(
                            height: 5.0,
                          ),
                        ],
                      ))
                ],
              ),
              const SizedBox(
                height: 10.0,
              ),
                Text(
                  relation["Prenom"],
                  style: const TextStyle(color: Colors.white, fontSize: 16.0),
                ),
              const SizedBox(
                height: 10.0,
              ),
              const Divider(
                thickness: 1.5,
                color: Color(0xFF505050),
              ),
              Row(
                children: [
                  actionButton(Icons.remove, "Supprimer", const Color(0xFF505050),
                          () {
                        inspect("jij");
                      }),
                  actionButton(Icons.circle_rounded, "Afficher", const Color(0xFF505050),
                          () {
                        inspect("jij");
                      }),
                ],
              )
            ],
          ),
        ));
  }
}
