import 'package:flutter/material.dart';

class DropdownItemWidget extends StatefulWidget {
  @override
  _DropdownItemState createState() => _DropdownItemState();
}

class _DropdownItemState extends State<DropdownItemWidget> {
  var _selectedValue;
  var _categories = <DropdownMenuItem>[];

  @override
  void initState() {
    super.initState();
    _loadItems();
  }

  _loadItems() {
    var items = [
      {"name": "jij1"},
      {"name": "jij2"},
      {"name": "jij3"},
      {"name": "jij4"},
    ];
    items.forEach((item) {
      setState(() {
        _categories.add(DropdownMenuItem(
          child: Text(item["name"].toString()),
          value: item["name"].toString(),
        ));
      });
    });
  }

  @override
  Widget build(BuildContext context) {
    return DropdownButtonFormField(
      value: _selectedValue,
      items: [
        DropdownMenuItem(
          child: Text("jij"),
          value: "jij",
        )
      ],
      onChanged: (value) {
        setState(() {
          _selectedValue = value;
        });
      },
    );
  }
}
