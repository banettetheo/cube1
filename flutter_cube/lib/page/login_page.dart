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
  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
  Color mainBlue = const Color(0xff03989e);

  void setPreferences(username, password) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    prefs.setString('usernameCube', username);
    prefs.setString('passwordCube', password);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: bgBlue,
        appBar: AppBar(elevation: 0, backgroundColor: bgBlue),
        body: Container(
          color: bgBlue,
          padding: const EdgeInsets.symmetric(horizontal: 35.0),
          child: Column(
            children: [
              const Text(
                "Ecran de connexion",
                style: TextStyle(
                    fontSize: 26,
                    fontStyle: FontStyle.normal,
                    color: Colors.white),
              ),
              const SizedBox(
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
              const SizedBox(
                height: 26.0,
              ),
              TextFieldWidget(
                  maxLines: 1,
                  label: "Mot de passe",
                  text: "",
                  onChanged: (password) {
                    _password = password;
                  }),
              const SizedBox(
                height: 26.0,
              ),
              ElevatedButton(
                style: ElevatedButton.styleFrom(
                    shape: const StadiumBorder(),
                    onPrimary: Colors.white,
                    primary: mainBlue),
                onPressed: () {
                  setPreferences(_username, _password);
                },
                child: const Text("Connexion"),
              ),
              const SizedBox(
                height: 46.0,
              ),
              const Divider(
                thickness: 1.5,
                color: Colors.grey,
              ),
              const SizedBox(
                height: 46.0,
              ),
              const Text(
                "Vous n'avez pas de compte? Créez-en un!",
                style: TextStyle(
                    fontSize: 12,
                    fontStyle: FontStyle.normal,
                    color: Colors.white),
              ),
              const SizedBox(
                height: 16.0,
              ),
              ElevatedButton(
                style: ElevatedButton.styleFrom(
                    shape: const StadiumBorder(),
                    onPrimary: Colors.white,
                    primary: mainBlue),
                onPressed: () {},
                child: const Text("S'enregistrer"),
              ),
            ],
          ),
        ));
  }
}
