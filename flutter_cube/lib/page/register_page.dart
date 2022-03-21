import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';
import 'package:http/http.dart';

class RegisterPage extends StatelessWidget {
  const RegisterPage({
    Key? key,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    var _nom;
    var _prenom;
    var _email;
    var _password;
    var url = "http://10.0.2.2:8000/api/register";

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
          Text(
            "S'enregistrer",
            textAlign: TextAlign.center,
            style: TextStyle(
                color: Colors.white, fontSize: 25, fontStyle: FontStyle.normal),
          ),
          //ProfileWidget(imagePath: user.imagePath, onClicked: () {}),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Nom",
              text: '',
              maxLines: 1,
              onChanged: (name) {
                _nom = name;
              }),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Prénom",
              text: '',
              maxLines: 1,
              onChanged: (prenom) {
                _prenom = prenom;
              }),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Email",
              text: '',
              maxLines: 1,
              onChanged: (email) {
                _email = email;
              }),
          const SizedBox(height: 24),
          TextFieldWidget(
              label: "Mot de passe",
              text: '',
              maxLines: 1,
              onChanged: (password) {
                _password = password;
              }),
          const SizedBox(height: 36),
          ElevatedButton(
            style: ElevatedButton.styleFrom(
              shape: const StadiumBorder(),
              onPrimary: Colors.white,
            ),
            onPressed: () async {
              try {
                var response = await post(Uri.parse(url), headers: {
                  "Content-Type":
                      "application/x-www-form-urlencoded; charset=UTF-8",
                  "Accept": "application/json"
                }, body: {
                  "name": _nom,
                  "prenom": _prenom,
                  "email": _email,
                  "password": _password,
                }).then((value) {
                  print(value.body);
                });
              } catch (e) {
                print(e);
              }
            },
            child: const Text("Sauvegarder les paramètres"),
          ),
        ],
      ),
    );
  }
}
