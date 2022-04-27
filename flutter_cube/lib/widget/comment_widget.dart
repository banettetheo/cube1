import 'package:flutter/material.dart';

class CommentWidget extends StatefulWidget {
  final comment;
  const CommentWidget({
    Key? key,
    required this.comment,
  }) : super(key: key);

  @override
  _CommentWidgetState createState() => _CommentWidgetState();
}

class _CommentWidgetState extends State<CommentWidget> {
  @override
  Widget build(BuildContext context) {
    const mainBlue = Color(0xff03989e);
    return Material(
        borderRadius: BorderRadius.circular(12.0),
        child: Container(
          //margin: EdgeInsets.only(bottom: 20.0),
          width: double.infinity,
          decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(12.0),
            color: mainBlue,
          ),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              const SizedBox(
                height: 20,
              ),
              Row(
                children: [
                  const SizedBox(
                    width: 20,
                  ),
                  Text(
                    widget.comment["utilisateur"]["Prenom"],
                    style: const TextStyle(color: Colors.black, fontSize: 15),
                  ),
                  const SizedBox(
                    width: 10,
                  ),
                  Text(widget.comment["utilisateur"]["name"],
                      style:
                          const TextStyle(color: Colors.black, fontSize: 15)),
                  const SizedBox(
                    width: 20,
                  ),
                ],
              ),
              const SizedBox(
                height: 20,
              ),
              Text(widget.comment["contenu"],
                  style: const TextStyle(color: Colors.black, fontSize: 15)),
              const SizedBox(
                height: 20,
              ),
            ],
          ),
        ));
  }
}
