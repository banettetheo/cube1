import 'package:flutter/material.dart';

Widget notificationBox(String notificationContent, String date) {
  return Container(
      margin: const EdgeInsets.only(bottom: 20.0),
      width: double.infinity,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(12.0),
        color: const Color(0xFF262626),
      ),
      child: Padding(
        padding: const EdgeInsets.all(8.0),
        child: Column(
          children: [
            const SizedBox(
              height: 10.0,
            ),
            Text(
              notificationContent,
              style: const TextStyle(color: Colors.white, fontSize: 16.0),
            ),
            const SizedBox(
              height: 10.0,
            ),
            Text(
              date,
              style: const TextStyle(color: Colors.white, fontSize: 10.0),
            ),
          ],
        ),
      ));
}
