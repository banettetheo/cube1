import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/widget/profile_widget.dart';

class AccountPage extends StatelessWidget {
  final String userName;
  final String urlImage;

  const AccountPage({
    Key? key,
    required this.userName,
    required this.urlImage,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    User user = new User(
        imagePath:
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
        name: "Théo",
        email: "theobanette@icloud.com",
        about: "Giga bg de la street tu coco",
        isDarkMode: false);
    return Scaffold(
      appBar: AppBar(
        leading: BackButton(),
        elevation: 0,
        backgroundColor: Colors.transparent,
      ),
      body: ListView(
        physics: const BouncingScrollPhysics(),
        children: [
          ProfileWidget(imagePath: urlImage, onClicked: () async {}),
          const SizedBox(height: 24),
          buildName(user),
          const SizedBox(height: 24),
          buildAbout(user)
        ],
      ),
    );
  }

  Widget buildName(User user) => Column(
        children: [
          Text(
            user.name,
            style: TextStyle(fontWeight: FontWeight.bold, fontSize: 25.0),
          ),
          const SizedBox(height: 4),
          Text(
            user.email,
            style: TextStyle(color: Colors.grey),
          )
        ],
      );

  Widget buildAbout(User user) => Container(
        padding: EdgeInsets.symmetric(horizontal: 50),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              'A propos',
              style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 16),
            Text(
              user.about,
              style: TextStyle(fontSize: 16, height: 1.5),
            )
          ],
        ),
      );
}
