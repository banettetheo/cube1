// ignore_for_file: deprecated_member_use

import 'package:flutter/material.dart';

class ActionButton extends StatelessWidget {
  final icon;
  final String actionTitle;
  final Color iconColor;
  final VoidCallback? onClicked;

  const ActionButton(
      {Key? key,
      required this.icon,
      required this.actionTitle,
      required this.iconColor,
      required this.onClicked})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return FlatButton.icon(
        onPressed: onClicked,
        icon: Icon(
          icon,
          color: iconColor,
        ),
        label: Text(
          actionTitle,
          style: const TextStyle(
            color: Colors.white,
          ),
        ));
  }
}
