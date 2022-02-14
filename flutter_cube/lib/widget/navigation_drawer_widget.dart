// ignore_for_file: deprecated_member_use

import 'package:flutter/material.dart';
import 'package:flutter_cube/page/account_page.dart';
import 'package:flutter_cube/page/friends_page.dart';

class NavigationWidgetDrawer extends StatelessWidget {
  final padding = const EdgeInsets.symmetric(horizontal: 20.0);
  @override
  Widget build(BuildContext context) {
    const userName = 'Théo Banette';
    const email = 'theobanette@icloud.com';
    const urlImage = "https://avatars.githubusercontent.com/u/90037413?v=4";
    return Drawer(
      child: Material(
        color: const Color.fromRGBO(50, 75, 205, 1),
        child: ListView(
          padding: padding,
          children: <Widget>[
            buildHeader(
                urlImage: urlImage,
                userName: userName,
                email: email,
                onClicked: () => Navigator.of(context).push(MaterialPageRoute(
                    builder: (context) => const AccountPage(
                          userName: userName,
                          urlImage: urlImage,
                        )))),
            const SizedBox(height: 16),
            buildMenuItem(
              text: 'Amis',
              icon: Icons.people,
            ),
            const SizedBox(height: 16),
            buildMenuItem(
              text: 'Mes publications',
              icon: Icons.article,
            ),
            const SizedBox(height: 16),
            buildMenuItem(
              text: 'Publications aimées',
              icon: Icons.thumb_up,
            ),
            const SizedBox(height: 20.0),
            const Divider(color: Colors.white70),
            const SizedBox(height: 20.0),
            buildMenuItem(
              text: 'Notifications',
              icon: Icons.notifications,
            ),
            const SizedBox(height: 16),
            buildMenuItem(
              text: 'Déconnexion',
              icon: Icons.logout,
            ),
          ],
        ),
      ),
    );
  }

  Widget buildHeader({
    required String urlImage,
    required String userName,
    required String email,
    required VoidCallback onClicked,
  }) =>
      InkWell(
          onTap: onClicked,
          child: Container(
            padding: padding.add(const EdgeInsets.symmetric(vertical: 40)),
            child: Row(
              children: [
                CircleAvatar(
                    radius: 30, backgroundImage: NetworkImage(urlImage)),
                const SizedBox(width: 25.0),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      userName,
                      style:
                          const TextStyle(fontSize: 20.0, color: Colors.white),
                    ),
                    const SizedBox(height: 4.0),
                    Text(
                      email,
                      style:
                          const TextStyle(fontSize: 10.0, color: Colors.white),
                    )
                  ],
                )
              ],
            ),
          ));

  Widget buildMenuItem({
    required String text,
    required IconData icon,
    VoidCallback? onClicked,
  }) {
    const color = Colors.white;
    const hoverColor = Colors.white70;
    return ListTile(
      leading: Icon(icon, color: color),
      title: Text(text, style: const TextStyle(color: color)),
      hoverColor: hoverColor,
      onTap: onClicked,
    );
  }

  void selectedItem(BuildContext context, int i) {
    switch (i) {
      case 1:
        Navigator.of(context).push(MaterialPageRoute(
          builder: (context) => FriendsPage(),
        ));
        break;
      default:
    }
  }
}
