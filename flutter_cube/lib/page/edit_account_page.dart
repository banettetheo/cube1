import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
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
      backgroundColor: Color(0xff03989e),
      appBar: AppBar(
        leading: const BackButton(
          color: Colors.black,
        ),
        elevation: 0,
        backgroundColor: Color(0xff03989e),
      ),
      body: ListView(
        padding: const EdgeInsets.symmetric(horizontal: 25.0),
        physics: const BouncingScrollPhysics(),
        children: [
          //ProfileWidget(imagePath: user.imagePath, onClicked: () {}),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Nom", text: user.nom, maxLines: 1, onChanged: (name) {}),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Prénom",
              text: user.nom,
              maxLines: 1,
              onChanged: (name) {}),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Email",
              text: user.email,
              maxLines: 1,
              onChanged: (email) {}),
          const SizedBox(height: 24),
          ElevatedButton(
            style: ElevatedButton.styleFrom(
              shape: const StadiumBorder(),
              onPrimary: Colors.white,
            ),
            onPressed: () {},
            child: const Text("Sauvegarder les paramètres"),
          ),
        ],
      ),
    );
  }
}
