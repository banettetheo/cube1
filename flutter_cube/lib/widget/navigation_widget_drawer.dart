// ignore_for_file: deprecated_member_use

import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/page/account_page.dart';
import 'package:flutter_cube/page/friends_page.dart';
import 'package:flutter_cube/page/liked_post_page.dart';
import 'package:flutter_cube/page/login_page.dart';
import 'package:flutter_cube/page/notification_page.dart';
import 'package:flutter_cube/page/post_page.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../main.dart';
import '../page/edit_account_page.dart';

class NavigationDrawer extends StatefulWidget {
  final Map<String, dynamic> data;

  const NavigationDrawer({
    Key? key,
    required this.data,
  }) : super(key: key);

  @override
  _NavigationDrawer createState() => _NavigationDrawer();
}

class _NavigationDrawer extends State<NavigationDrawer> {
  final padding = const EdgeInsets.symmetric(horizontal: 20.0);
  late User? user;

  void readData() {
    if (widget.data.containsKey('user')) {
      setState(() {
        user = User.fromMap(widget.data);
      });
    } else {
      user = null;
    }
  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    readData();
  }

  @override
  Widget build(BuildContext context) {
    if (user != null) {
      return Drawer(
        child: Material(
          color: const Color(0xff03989e),
          child: ListView(
            padding: padding,
            children: [
              buildHeader(
                  //urlImage: user.prenom,
                  userName: user!.nom,
                  email: user!.email,
                  onClicked: () => Navigator.of(context).push(MaterialPageRoute(
                      builder: (context) => EditAccountPage(
                            user: user!,
                          )))),
              const SizedBox(height: 16),
              buildMenuItem(
                text: 'Relations',
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
                text: 'Favoris',
                icon: Icons.thumb_up,
                onClicked: () => selectedItem(context, 2),
              ),
              const SizedBox(height: 20.0),
              const Divider(color: Colors.white70),
              const SizedBox(height: 20.0),
              /*buildMenuItem(
                text: 'Notifications',
                icon: Icons.notifications,
                onClicked: () => selectedItem(context, 3),
              ),
              const SizedBox(height: 16),*/
              buildMenuItem(
                text: 'Déconnexion',
                icon: Icons.logout,
                onClicked: () => selectedItem(context, 4),
              ),
            ],
          ),
        ),
      );
    } else {
      return Drawer(
        child: Material(
          color: const Color(0xff03989e),
          child: ListView(
            padding: padding,
            children: [
              const Image(
                  image: NetworkImage(
                      "https://cdn.discordapp.com/attachments/870209678192304169/948980643285577738/unknown.png")),
              const SizedBox(height: 20.0),
              const Text(
                "Vous n'êtes actuellement pas connecté. Afin d'utiliser au mieux les ressources de notre application, veuillez vous connecter.",
                style: TextStyle(
                  fontSize: 15,
                  color: Colors.white,
                ),
              ),
              const SizedBox(height: 20.0),
              const Divider(color: Colors.white70),
              const SizedBox(height: 20.0),
              const SizedBox(height: 16),
              buildMenuItem(
                text: 'Connexion',
                icon: Icons.login,
                onClicked: () => selectedItem(context, 5),
              ),
            ],
          ),
        ),
      );
    }
  }

  Widget buildHeader({
    //required String urlImage,
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
                /*CircleAvatar(
                    radius: 30, backgroundImage: NetworkImage(urlImage)),
                const SizedBox(width: 25.0),*/
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
          builder: (context) => FriendPage(token: widget.data["token"]),
        ));
        break;
      case 1:
        Navigator.of(context).push(MaterialPageRoute(
          builder: (context) => PostPage(user: user!),
        ));
        break;
      case 2:
        Navigator.of(context).push(MaterialPageRoute(
          builder: (context) => LikedPostPage(token: widget.data["token"]),
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
            title: const Text("Se déconnecter?"),
            content: const Text("Le menu de connexion s'affichera"),
            actions: [
              FlatButton(
                  onPressed: () async {
                    SharedPreferences prefs = await SharedPreferences.getInstance();
                    Navigator.pop(context);
                    Navigator.pushReplacement(
                      context,
                        MaterialPageRoute (
                          builder: (BuildContext context) => HomePage(),
                        ),
                    );
                    prefs.setString('usernameCube', '');
                    prefs.setString('passwordCube', '');
                    Navigator.of(context).push(MaterialPageRoute(
                      builder: (context) => const LoginScreen(),
                    ));
                  },
                  child: const Text("Oui")),
              FlatButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: const Text("Non")),
            ],
          ),
        );
        break;
      case 5:
        Navigator.pop(context);
        showDialog(
          context: context,
          builder: (context) => AlertDialog(
            title: const Text("Se connecter?"),
            content: const Text("Le menu de connexion s'affichera"),
            actions: [
              FlatButton(
                  onPressed: () {
                    Navigator.pop(context);
                    Navigator.of(context).push(MaterialPageRoute(
                      builder: (context) => const LoginScreen(),
                    ));
                  },
                  child: const Text("Oui")),
              FlatButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: const Text("Non")),
            ],
          ),
        );
        break;
      default:
    }
  }
}
