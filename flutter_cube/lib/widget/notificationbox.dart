import 'package:flutter/material.dart';
import 'actionbtn.dart';

Widget notificationBox(String notificationContent, String date) {
  return Container(
      margin: EdgeInsets.only(bottom: 20.0),
      width: double.infinity,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(12.0),
        color: Color(0xFF262626),
      ),
      child: Padding(
        padding: EdgeInsets.all(8.0),
        child: Column(
          children: [
            SizedBox(
              height: 10.0,
            ),
            Text(
              notificationContent,
              style: TextStyle(color: Colors.white, fontSize: 16.0),
            ),
            SizedBox(
              height: 10.0,
            ),
            Text(
              date,
              style: TextStyle(color: Colors.white, fontSize: 10.0),
            ),
          ],
        ),
      ));
}
