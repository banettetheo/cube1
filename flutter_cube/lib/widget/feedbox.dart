import 'package:flutter/material.dart';
import 'actionbtn.dart';

Widget feedBox(String avatarUrl, String userName, String date,
    String contentText, String contentImg) {
  return Container(
      margin: EdgeInsets.only(bottom: 20.0),
      width: double.infinity,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(12.0),
        color: const Color(0xff03989e),
      ),
      child: Padding(
        padding: EdgeInsets.all(8.0),
        child: Column(
          children: [
            Row(
              children: [
                CircleAvatar(
                  backgroundImage: NetworkImage(avatarUrl),
                  radius: 25.0,
                ),
                const SizedBox(
                  width: 10.0,
                ),
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
                    Text(date,
                        style: const TextStyle(
                          color: Colors.black,
                          fontSize: 12.0,
                          fontWeight: FontWeight.w600,
                        ))
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
                actionButton(Icons.thumb_up, "Aimer", const Color(0xFF505050)),
                actionButton(Icons.comment, "Comment", const Color(0xFF505050)),
                actionButton(Icons.share, "Partager", const Color(0xFF505050)),
              ],
            )
          ],
        ),
      ));
}
