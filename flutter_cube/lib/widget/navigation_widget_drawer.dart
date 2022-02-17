// ignore_for_file: deprecated_member_use

import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/page/account_page.dart';
import 'package:flutter_cube/page/friends_page.dart';
import 'package:flutter_cube/page/liked_post_page.dart';
import 'package:flutter_cube/page/notification_page.dart';
import 'package:flutter_cube/page/post_page.dart';

class NavigationWidgetDrawer extends StatelessWidget {
  final padding = const EdgeInsets.symmetric(horizontal: 20.0);
  final User user;

  const NavigationWidgetDrawer({
    Key? key,
    required this.user,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: Material(
        color: const Color.fromRGBO(50, 75, 205, 1),
        child: ListView(
          padding: padding,
          children: <Widget>[
            buildHeader(
                urlImage: user.imagePath,
                userName: user.name,
                email: user.email,
                onClicked: () => Navigator.of(context).push(MaterialPageRoute(
                    builder: (context) => AccountPage(
                          user: user,
                        )))),
            const SizedBox(height: 16),
            buildMenuItem(
              text: 'Amis',
              icon: Icons.people,
              onClicked: () => selectedItem(context, 0),
            ),
            const SizedBox(height: 16),
            buildMenuItem(
              text: 'Mes publications',
              icon: Icons.article,
              onClicked: () => selectedItem(context, 1),
            ),
            const SizedBox(height: 16),
            buildMenuItem(
              text: 'Publications aimées',
              icon: Icons.thumb_up,
              onClicked: () => selectedItem(context, 2),
            ),
            const SizedBox(height: 20.0),
            const Divider(color: Colors.white70),
            const SizedBox(height: 20.0),
            buildMenuItem(
              text: 'Notifications',
              icon: Icons.notifications,
              onClicked: () => selectedItem(context, 3),
            ),
            const SizedBox(height: 16),
            buildMenuItem(
              text: 'Déconnexion',
              icon: Icons.logout,
              onClicked: () => selectedItem(context, 4),
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
      case 0:
        Navigator.of(context).push(MaterialPageRoute(
          builder: (context) => FriendsPage(),
        ));
        break;
      case 1:
        Navigator.of(context).push(MaterialPageRoute(
          builder: (context) => PostPage(),
        ));
        break;
      case 2:
        Navigator.of(context).push(MaterialPageRoute(
          builder: (context) => LikedPostPage(),
        ));
        break;
      case 3:
        Navigator.of(context).push(MaterialPageRoute(
          builder: (context) => NotificationPage(),
        ));
        break;
      case 4:
        Navigator.pop(context);
        showDialog(
          context: context,
          builder: (context) => AlertDialog(
            title: Text("Se déconnecter?"),
            content: Text("Le menu de connexion s'affichera"),
            actions: [
              FlatButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: Text("Oui")),
              FlatButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: Text("Non")),
            ],
          ),
        );
        break;
      default:
    }
  }
}
