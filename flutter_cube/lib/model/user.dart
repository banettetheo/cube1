class User {
  final int id;
  final String nom;
  final String prenom;
  final String email;
  final int moderateur;

  const User({
    required this.id,
    required this.nom,
    required this.email,
    required this.prenom,
    required this.moderateur,
  });
}
