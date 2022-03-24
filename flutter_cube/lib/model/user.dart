class User {
  final int id;
  final String nom;
  final String prenom;
  final String email;
  final int moderateur;
  final int compteBan;
  final String? verifiedEmailAt;
  final String? createdAt;
  final String? updatedAt;

  const User({
    required this.id,
    required this.nom,
    required this.email,
    required this.prenom,
    required this.moderateur,
    required this.compteBan,
    required this.createdAt,
    required this.updatedAt,
    required this.verifiedEmailAt,
  });

  User.fromMap(Map<String, dynamic> map)
      : id = map["user"]["id"],
        nom = map["user"]["name"],
        email = map["user"]["email"],
        prenom = map["user"]["Prenom"],
        moderateur = map["user"]["Moderateur"],
        compteBan = map["user"]["Compte_ban"],
        createdAt = map["user"]["created_at"],
        updatedAt = map["user"]["updated_at"],
        verifiedEmailAt = map["user"]["email_verified_at"];

  @override
  String toString() {
    return 'User{id: $id, name: $nom, email: $email}';
  }
}
