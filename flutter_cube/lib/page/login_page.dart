import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LoginScreen extends StatefulWidget {
  const LoginScreen({Key? key}) : super(key: key);

  @override
  _LoginScreenState createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  String _username = "";
  String _password = "";

  void setPreferences(username, password) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    prefs.setString('usernameCube', username);
    prefs.setString('passwordCube', password);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          elevation: 0,
          backgroundColor: const Color(0xff03989e),
        ),
        body: Container(
          color: const Color(0xff03989e),
          padding: const EdgeInsets.symmetric(horizontal: 35.0),
          child: Column(
            children: [
              const Text(
                "Ecran de connexion",
                style: TextStyle(fontSize: 26, fontStyle: FontStyle.normal),
              ),
              SizedBox(
                height: 46.0,
              ),
              TextFieldWidget(
                  maxLines: 1,
                  label: "UserName",
                  text: "",
                  onChanged: (username) {
                    _username = username;
                    inspect(_username);
                  }),
              SizedBox(
                height: 26.0,
              ),
              TextFieldWidget(
                  maxLines: 1,
                  label: "Mot de passe",
                  text: "",
                  onChanged: (password) {
                    _password = password;
                  }),
              SizedBox(
                height: 26.0,
              ),
              ElevatedButton(
                style: ElevatedButton.styleFrom(
                  shape: StadiumBorder(),
                  onPrimary: Colors.white,
                ),
                onPressed: () {
                  setPreferences(_username, _password);
                },
                child: Text("Connexion"),
              ),
              SizedBox(
                height: 46.0,
              ),
              Divider(
                thickness: 1.5,
                color: Colors.grey,
              ),
              SizedBox(
                height: 46.0,
              ),
              const Text(
                "Vous n'avez pas de compte? Créez-en un!",
                style: TextStyle(fontSize: 12, fontStyle: FontStyle.normal),
              ),
              SizedBox(
                height: 16.0,
              ),
              ElevatedButton(
                style: ElevatedButton.styleFrom(
                  shape: const StadiumBorder(),
                  onPrimary: Colors.white,
                ),
                onPressed: () {},
                child: const Text("S'enregistrer"),
              ),
            ],
          ),
        ));
  }
}
