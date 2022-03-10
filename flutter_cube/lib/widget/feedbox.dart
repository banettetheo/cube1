import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/widget/comment_widget.dart';
import 'actionbtn.dart';

class FeedBox extends StatelessWidget {
  final ressource;
  const FeedBox({Key? key, required this.ressource}) : super(key: key);

  Widget build(BuildContext context) {
    Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
    Color mainBlue = const Color(0xff03989e);
    return Container(
        margin: EdgeInsets.only(bottom: 20.0),
        width: double.infinity,
        decoration: BoxDecoration(
          borderRadius: BorderRadius.circular(12.0),
          color: mainBlue,
        ),
        child: Padding(
          padding: EdgeInsets.all(8.0),
          child: Column(
            children: [
              Row(
                children: [
                  Expanded(
                      child: Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(ressource["utilisateur"]["Nom"],
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
              if (ressource["contenu"] != "")
                Text(
                  ressource["contenu"],
                  style: const TextStyle(color: Colors.white, fontSize: 16.0),
                ),
              const SizedBox(
                height: 10.0,
              ),
              if (ressource["lienRessource"] != "")
                Image.network(ressource["lienRessource"]),
              const SizedBox(
                height: 10.0,
              ),
              const Divider(
                thickness: 1.5,
                color: Color(0xFF505050),
              ),
              Row(
                children: [
                  actionButton(
                      Icons.thumb_up, "Aimer", const Color(0xFF505050), () {}),
                  actionButton(
                      Icons.comment,
                      "Comment",
                      const Color(0xFF505050),
                      () => showGeneralDialog(
                          context: context,
                          pageBuilder: (bc, ania, anis) {
                            return Container(
                              color: bgBlue,
                              child: Padding(
                                padding: const EdgeInsets.all(20.0),
                                child: Column(
                                  mainAxisAlignment:
                                      MainAxisAlignment.spaceBetween,
                                  children: [
                                    for (var comment
                                        in ressource["commentaires"])
                                      CommentWidget(comment: comment),
                                    ElevatedButton(
                                        onPressed: () {
                                          Navigator.of(context).pop();
                                        },
                                        child: Text("Close"))
                                  ],
                                ),
                              ),
                            );
                          })),
                  actionButton(Icons.share, "Partager", const Color(0xFF505050),
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
