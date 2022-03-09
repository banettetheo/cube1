import 'dart:developer';

import 'package:flutter/material.dart';
import 'actionbtn.dart';

class FeedBox extends StatelessWidget {
  final String userName;
  final String contentText;
  final String contentImg;
  const FeedBox({
    Key? key,
    required this.userName,
    required this.contentImg,
    required this.contentText,
  }) : super(key: key);

  Widget build(BuildContext context) {
    const mainBlue = const Color(0xff03989e);
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
                      Text(userName,
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
              if (contentText != "")
                Text(
                  contentText,
                  style: const TextStyle(color: Colors.white, fontSize: 16.0),
                ),
              const SizedBox(
                height: 10.0,
              ),
              if (contentImg != "") Image.network(contentImg),
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
                            return SizedBox.expand(
                              child: Container(
                                color: mainBlue,
                                child: Padding(
                                  padding: const EdgeInsets.all(20.0),
                                  child: Column(
                                    mainAxisAlignment:
                                        MainAxisAlignment.spaceBetween,
                                    children: [
                                      FlutterLogo(
                                        size: 200,
                                      ),
                                      /*for (var comment in items) {
                                        
                                      }*/
                                      Text(
                                        "This is a Full Screen Dialog",
                                        style: TextStyle(
                                            fontSize: 20,
                                            decoration: TextDecoration.none),
                                      ),
                                      ElevatedButton(
                                          onPressed: () {
                                            Navigator.of(context).pop();
                                          },
                                          child: Text("Close"))
                                    ],
                                  ),
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
