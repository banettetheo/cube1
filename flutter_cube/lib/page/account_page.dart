import 'package:flutter/material.dart';

class AccountPage extends StatelessWidget {
  final String userName;
  final String urlImage;

  const AccountPage({
    Key? key,
    required this.userName,
    required this.urlImage,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) => Scaffold(
        appBar: AppBar(
          title: Text('Mon compte'),
          centerTitle: true,
          backgroundColor: Colors.green,
        ),
      );
}
