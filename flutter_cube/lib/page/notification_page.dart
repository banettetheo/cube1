import 'package:flutter/material.dart';
import 'package:flutter_cube/widget/notificationbox.dart';

class NotificationPage extends StatelessWidget {
  var _notifs = [];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Toutes les notifications'),
        centerTitle: true,
        backgroundColor: Colors.green,
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              for (var _notif in _notifs)
                notificationBox(
                    _notif["content"].toString(), _notif["date"].toString()),
            ],
          ),
        ),
      ),
    );

    /*Future<void> readJson() async {
    final String response = await rootBundle.loadString('../json/datas.json');
    final data = await json.decode(response);
    setState(() {
      _notifs = data;
    });
    // ...
  }*/
  }
}
