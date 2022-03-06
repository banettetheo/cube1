import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/widget/actionbtn.dart';
import 'package:flutter_cube/widget/dropdownitem.dart';
import 'package:flutter_cube/widget/profile_widget.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';

class NewResourcePage extends StatelessWidget {
  final User user;

  const NewResourcePage({
    Key? key,
    required this.user,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) => Scaffold(
        appBar: AppBar(
          title: const Text('Nouvelle publication'),
          centerTitle: true,
          backgroundColor: Colors.green,
        ),
        body: ListView(
          padding: const EdgeInsets.symmetric(horizontal: 25.0),
          physics: const BouncingScrollPhysics(),
          children: [
            const SizedBox(height: 24),
            TextFieldWidget(
                label: "Titre de la ressource",
                text: "",
                maxLines: 1,
                onChanged: (name) {}),
            const SizedBox(height: 24),
            DropdownItemWidget(),
            const SizedBox(height: 24),
            DropdownItemWidget(),
            const SizedBox(height: 24),
            TextFieldWidget(
                label: "Contenu de la ressource",
                text: "",
                maxLines: 5,
                onChanged: (about) {}),
            const SizedBox(height: 24),
            ElevatedButton(
              style: ElevatedButton.styleFrom(
                shape: StadiumBorder(),
                onPrimary: Colors.white,
              ),
              onPressed: () {},
              child: Text("Sauvegarder la ressource"),
            ),
          ],
        ),
      );
}
