import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';
import 'package:http/http.dart';

import 'login_page.dart';

class RegisterPage extends StatefulWidget {
  const RegisterPage({Key? key}) : super(key: key);

  @override
  State<RegisterPage> createState() => _RegisterPageState();
}

class _RegisterPageState extends State<RegisterPage> {
  String _nom = '';
  String _prenom = '';
  String _email = '';
  String _password = '';
  String _passwordConfirmation = '';
  var url = "http://10.0.2.2:8000/api/register";

  Future<Map<String, dynamic>> register(String name, String prenom, String email, String password) async {
    try{
      var json;
      var response = await post(Uri.parse(url), headers: {
        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        "Accept": "application/json"
      }, body: {
        "name": name,
        "prenom": prenom,
        "email": email,
        "password": password,
        "password_confirmation": password
      }).then((value) {
        json = jsonDecode(value.body);
      });
      return json;
    } catch(e) {
      String err = '''
      {
        "erreur": "La requete n'est pas arrivée à son terme!",
      }''';
      return jsonDecode(err);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color.fromARGB(255, 41, 218, 224),
      appBar: AppBar(
        leading: const BackButton(
          color: Colors.black,
        ),
        elevation: 0,
        backgroundColor: const Color.fromARGB(255, 41, 218, 224),
      ),
      body: ListView(
        padding: const EdgeInsets.symmetric(horizontal: 25.0),
        physics: const BouncingScrollPhysics(),
        children: [
          const Text(
            "S'enregistrer",
            textAlign: TextAlign.center,
            style: TextStyle(
                color: Colors.white, fontSize: 25, fontStyle: FontStyle.normal),
          ),
          //ProfileWidget(imagePath: user.imagePath, onClicked: () {}),
          const SizedBox(height: 20),
          TextFieldWidget(
              label: "Nom",
              text: '',
              maxLines: 1,
              onChanged: (name) {
                _nom = name;
              }),
          const SizedBox(height: 20),
          TextFieldWidget(
              label: "Prénom",
              text: '',
              maxLines: 1,
              onChanged: (prenom) {
                _prenom = prenom;
              }),
          const SizedBox(height: 20),
          TextFieldWidget(
              label: "Email",
              text: '',
              maxLines: 1,
              onChanged: (email) {
                _email = email;
              }),
          const SizedBox(height: 20),
          TextFieldWidget(
              label: "Mot de passe",
              text: '',
              maxLines: 1,
              onChanged: (password) {
                _password = password;
              }),
          const SizedBox(height: 30),
          TextFieldWidget(
              label: "Confirmez le mot de passe",
              text: '',
              maxLines: 1,
              onChanged: (passwordConfirmation) {
                _passwordConfirmation = passwordConfirmation;
              }),
          const SizedBox(height: 30),
          ElevatedButton(
            style: ElevatedButton.styleFrom(
              shape: const StadiumBorder(),
              onPrimary: Colors.white,
            ),
            onPressed: () async {
              if(_password == _passwordConfirmation) {
                Map<String, dynamic> response = await register(_nom, _prenom, _email, _password);
                Navigator.pushReplacement(
                  context,
                  MaterialPageRoute (
                    builder: (BuildContext context) => const LoginScreen(),
                  ),
                );
              } else {
                print("Echec de l'enregistrement");
              }
            },
            child: const Text("Sauvegarder les paramètres"),
          ),
        ],
      ),
    );
  }
}
