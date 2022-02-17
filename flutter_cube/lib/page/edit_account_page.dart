import 'package:flutter/cupertino.dart';

import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/widget/profile_widget.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';

class EditAccountPage extends StatelessWidget {
  final User user;

  const EditAccountPage({
    Key? key,
    required this.user,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: BackButton(
          color: Colors.black,
        ),
        elevation: 0,
        backgroundColor: Colors.transparent,
      ),
      body: ListView(
        padding: const EdgeInsets.symmetric(horizontal: 25.0),
        physics: const BouncingScrollPhysics(),
        children: [
          ProfileWidget(imagePath: user.imagePath, onClicked: () {}),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Nom complet",
              text: user.name,
              maxLines: 1,
              onChanged: (name) {}),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Email",
              text: user.email,
              maxLines: 1,
              onChanged: (email) {}),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "A propos",
              text: user.about,
              maxLines: 5,
              onChanged: (about) {}),
          const SizedBox(height: 24),
          ElevatedButton(
            style: ElevatedButton.styleFrom(
              shape: StadiumBorder(),
              onPrimary: Colors.white,
            ),
            onPressed: () {},
            child: Text("Sauvegarder les paramètres"),
          ),
        ],
      ),
    );
  }
}
