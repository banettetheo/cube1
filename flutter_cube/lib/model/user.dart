class User {
  final int id;
  final String nom;
  final String prenom;
  final String email;
  final String mdp;
  final bool moderateur;

  const User({
    required this.id,
    required this.nom,
    required this.email,
    required this.prenom,
    required this.mdp,
    required this.moderateur,
  });
}
