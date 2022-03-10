import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/page/edit_account_page.dart';
import 'package:flutter_cube/widget/profile_widget.dart';

class AccountPage extends StatelessWidget {
  final User user;

  const AccountPage({
    Key? key,
    required this.user,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Color bgBlue = const Color.fromARGB(255, 41, 218, 224);
    return Scaffold(
      backgroundColor: bgBlue,
      appBar: AppBar(
        leading: BackButton(
          color: Colors.white,
        ),
        elevation: 0,
        backgroundColor: Colors.transparent,
      ),
      body: ListView(
        physics: const BouncingScrollPhysics(),
        children: [
          /*ProfileWidget(
              imagePath: user.imagePath,
              onClicked: () {
                Navigator.of(context).push(MaterialPageRoute(
                    builder: (context) => EditAccountPage(
                          user: user,
                        )));
              }),*/
          const SizedBox(height: 24),
          buildName(user),
          const SizedBox(height: 24),
          //buildAbout(user)
        ],
      ),
    );
  }

  Widget buildName(User user) => Column(
        children: [
          Text(
            user.nom,
            style: TextStyle(fontWeight: FontWeight.bold, fontSize: 25.0),
          ),
          const SizedBox(height: 4),
          Text(
            user.email,
            style: TextStyle(color: Colors.grey),
          )
        ],
      );

  /*Widget buildAbout(User user) => Container(
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
      );*/
}
