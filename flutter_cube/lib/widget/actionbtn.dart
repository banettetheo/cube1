// ignore_for_file: deprecated_member_use

import 'package:flutter/material.dart';

Widget actionButton(IconData icon, String actionTitle, Color iconColor) {
  return Expanded(
      child: FlatButton.icon(
          onPressed: () {},
          icon: Icon(
            icon,
            color: iconColor,
          ),
          label: Text(
            actionTitle,
            style: TextStyle(
              color: Colors.white,
            ),
          )));
}
