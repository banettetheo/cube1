import 'dart:convert';
import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:flutter_cube/page/register_page.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';
import 'package:http/http.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LoginScreen extends StatefulWidget {
  const LoginScreen({Key? key}) : super(key: key);

  @override
  _LoginScreenState createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  final String url = "http://10.0.2.2:8000/api/login";
  String _username = "";
  String _password = "";
  Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
  Color mainBlue = const Color(0xff03989e);

  Future<void> setPreferences(String username, String password) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    prefs.setString('usernameCube', username);
    prefs.setString('passwordCube', password);
  }

  Future<Map<String, dynamic>> fetchAuth(String username, String password) async {
    try{
      var json;
      var response = await post(Uri.parse(url), headers: {
        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        "Accept": "application/json"
      }, body: {
        "email": username,
        "password": password
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
                onPressed: () async {
                  Map<String, dynamic> response = await fetchAuth(_username, _password);
                  if (response.containsKey('user')) {
                    setPreferences(_username, _password);
                    const AlertDialog(
                      title: Text("Connexion réussie"),
                      content: Text("La page d'accueil va s'afficher"),);
                    Navigator.pop(context);
                  } else {
                    const AlertDialog(
                      title: Text("Connexion échouée! réessayez!"),
                      content: Text("Email ou mot de passe incorrect"),);
                  }
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
                onPressed: () => Navigator.of(context).push(MaterialPageRoute(
                    builder: (context) => const RegisterPage())),
                child: const Text("S'enregistrer"),
              ),
            ],
          ),
        ));
  }
}
