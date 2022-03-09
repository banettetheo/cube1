import 'package:flutter/material.dart';
import 'package:flutter_cube/model/user.dart';
import 'package:flutter_cube/page/new_resource_page.dart';
import 'package:flutter_cube/widget/feedbox.dart';

class PostPage extends StatelessWidget {
  final User user;

  const PostPage({
    Key? key,
    required this.user,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    var myWall = [
      {
        "avatarUrl":
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
        "username": "Théo",
        "date": "maintenant",
        "contentText": "du jij",
        "contentImg":
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"
      },
      {
        "avatarUrl":
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
        "username": "Théo",
        "date": "maintenant",
        "contentText": "du jij",
        "contentImg":
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"
      },
      {
        "avatarUrl":
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
        "username": "Théo",
        "date": "maintenant",
        "contentText": "du jij",
        "contentImg":
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"
      },
      {
        "avatarUrl":
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg",
        "username": "Théo",
        "date": "maintenant",
        "contentText": "du jij",
        "contentImg":
            "http://trucsetastucesjeux.com/wp-content/uploads/2022/01/Genshin-Impact-25-Leaks-Yae-Miko-Weapon-Competences-Date-de.jpg"
      },
    ];
    return Scaffold(
      appBar: AppBar(
        title: const Text('Mes publications'),
        centerTitle: true,
        backgroundColor: Colors.green,
        actions: [
          IconButton(
              onPressed: () {
                Navigator.of(context).push(MaterialPageRoute(
                  builder: (context) => NewResourcePage(user: user),
                ));
              },
              icon: Icon(Icons.add))
        ],
      ),
      body: SingleChildScrollView(
          child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: Column(
                children: [
                  for (var post in myWall)
                    FeedBox(
                        userName: post["username"].toString(),
                        contentText: post["contentText"].toString(),
                        contentImg: post["contentImg"].toString())
                ],
              ))),
    );
  }
}
