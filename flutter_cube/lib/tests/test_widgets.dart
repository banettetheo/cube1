import 'package:flutter/material.dart';
import 'package:flutter_cube/widget/actionbtn.dart';
import 'package:flutter_cube/widget/comment_widget.dart';
import 'package:flutter_cube/widget/dropdownitem.dart';
import 'package:flutter_cube/widget/feedbox.dart';
import 'package:flutter_cube/widget/friendbox.dart';
import 'package:flutter_cube/widget/navigation_widget_drawer.dart';
import 'package:flutter_cube/widget/text_field_widget.dart';
import 'package:flutter_test/flutter_test.dart';

Map<String, dynamic> ressource = {
  "typeDeRessource": "privee",
  "id": 202,
  "titre": "siiiiiiiiiiiiiiiiiiiiiiiiii",
  "contenu": "uiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiuuuuuuuuuuuuuuuiuiui",
  "categorie": {"Nom": "Cultures"},
  "utilisateur": {"name": "Guillot", "Prenom": "Paul"},
  "type": {"Nom": "Carte defi"},
  "etat": {"id": 1, "Nom": "Privée"},
  "lienRessource": "",
  "commentaires": [
    {
      "id": 2,
      "utilisateur": {"id": 33, "name": "Charpentier", "Prenom": "Véronique"},
      "contenu":
          "Hatter. 'Nor I,' said the Caterpillar. Alice folded her hands, and she ran out of its mouth open, gazing up into the wood. 'If it had come back again, and we put a stop to this,' she said to the."
    }
  ],
  "nbLike": 0,
  "nbVue": 0
};

Map<String, dynamic> commentaire = {
  "id": 2,
  "utilisateur": {"id": 33, "name": "Charpentier", "Prenom": "Véronique"},
  "contenu":
      "Hatter. 'Nor I,' said the Caterpillar. Alice folded her hands, and she ran out of its mouth open, gazing up into the wood. 'If it had come back again, and we put a stop to this,' she said to the."
};

var relationtest = {
  "id": 182,
  "typeRelation": {"id": 3, "Nom": "Professionelle"},
  "utilisateur": {"id": 32, "name": "Rey", "Prenom": "Claudine"}
};

var types = [
  {"id": 1, "nom": "Activité / Jeu a réaliser"},
  {"id": 2, "nom": "Article"},
  {"id": 3, "nom": "Carte defi"},
  {"id": 4, "nom": "Cours au format PDF"},
  {"id": 5, "nom": "Exercice"},
  {"id": 6, "nom": "Fiche de lecture"},
  {"id": 7, "nom": "Jeu en ligne"},
  {"id": 8, "nom": "Qualité de vie"},
  {"id": 9, "nom": "Video"}
];

var data = {
  "user": {
    "id": 51,
    "name": "Guillot",
    "Prenom": "Paul",
    "Moderateur": 1,
    "Admin": 0,
    "SuperAdmin": 0,
    "Compte_ban": 0,
    "email": "paul@moderateur.com",
    "email_verified_at": "2022-03-25T11:41:33.000000Z",
    "created_at": null,
    "updated_at": null
  },
  "token": "136|M3TiJl5PppKmQmg8mzf6kemi2qBOOZRb8JKLHZpc"
};
void main() {
  // Define a test. The TestWidgets function also provides a WidgetTester
  // to work with. The WidgetTester allows building and interacting
  // with widgets in the test environment.
  testWidgets('Widget Commentaire', (WidgetTester tester) async {
    // Create the widget by telling the tester to build it.
    await tester.pumpWidget(MaterialApp(
      home: CommentWidget(comment: commentaire),
    ));

    // Use the `findsOneWidget` matcher provided by flutter_test to
    // verify that the Text widgets appear exactly once in the widget tree.
    expect(find.text("Véronique"), findsOneWidget);
  });

  testWidgets('Feedbox test', (WidgetTester tester) async {
    // Create the widget by telling the tester to build it.
    await tester.pumpWidget(
      MaterialApp(
        home: FeedBox(ressource: ressource),
      ),
    );

    //final messageFinder = find.text('M');

    // Use the `findsOneWidget` matcher provided by flutter_test to
    // verify that the Text widgets appear exactly once in the widget tree.
    expect(find.text("Paul"), findsWidgets);
  });

  testWidgets('action button', (WidgetTester tester) async {
    // Create the widget by telling the tester to build it.
    await tester.pumpWidget(MaterialApp(
        home: Scaffold(
      body: ActionButton(
          icon: Icons.share,
          actionTitle: "Aimer",
          iconColor: const Color(0xFF505050),
          onClicked: () {}),
    )));

    //final messageFinder = find.text('M');

    // Use the `findsOneWidget` matcher provided by flutter_test to
    // verify that the Text widgets appear exactly once in the widget tree.
    expect(find.text("Aimer"), findsWidgets);
  });

  testWidgets('Friend Box', (WidgetTester tester) async {
    // Create the widget by telling the tester to build it.
    await tester.pumpWidget(MaterialApp(
      home: FriendBox(relation: relationtest, token: 'siiiiiiiiii'),
    ));

    //final messageFinder = find.text('M');

    // Use the `findsOneWidget` matcher provided by flutter_test to
    // verify that the Text widgets appear exactly once in the widget tree.
    expect(find.text("Rey"), findsWidgets);
  });

  testWidgets('Dropdown Menu', (WidgetTester tester) async {
    // Create the widget by telling the tester to build it.
    await tester.pumpWidget(MaterialApp(
        home: Scaffold(
      body: DropdownItemWidget(
          data: types,
          onChanged: (value) {
            print('jij');
          }),
    )));

    //final messageFinder = find.text('M');

    // Use the `findsOneWidget` matcher provided by flutter_test to
    // verify that the Text widgets appear exactly once in the widget tree.
    expect(find.text("Cliquez pour choisir"), findsWidgets);
  });

  testWidgets('Drawer menu', (WidgetTester tester) async {
    // Create the widget by telling the tester to build it.
    await tester.pumpWidget(MaterialApp(
      home: NavigationDrawer(data: data),
    ));

    //final messageFinder = find.text('M');

    // Use the `findsOneWidget` matcher provided by flutter_test to
    // verify that the Text widgets appear exactly once in the widget tree.
    expect(find.text("Relations"), findsWidgets);
  });

  testWidgets('TextField test', (WidgetTester tester) async {
    // Create the widget by telling the tester to build it.
    await tester.pumpWidget(MaterialApp(
        home: Scaffold(
      body: TextFieldWidget(
          maxLines: 5,
          label: 'Si',
          text: "un test",
          onChanged: (value) {
            print("siiiiiii");
          }),
    )));

    //final messageFinder = find.text('M');

    // Use the `findsOneWidget` matcher provided by flutter_test to
    // verify that the Text widgets appear exactly once in the widget tree.
    expect(find.text("un test"), findsWidgets);
  });
}
