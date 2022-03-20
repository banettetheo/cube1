import 'package:flutter/material.dart';

class DropdownItemWidget extends StatefulWidget {
  var data = [];

  DropdownItemWidget({
    Key? key,
    required this.data,
  }) : super(key: key);

  @override
  _DropdownItemState createState() => _DropdownItemState();
}

class _DropdownItemState extends State<DropdownItemWidget> {
  var _selectedValue;

  @override
  void initState() {
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return DropdownButtonFormField(
      menuMaxHeight: 200.0,
      value: _selectedValue,
      items: [
        for (var item in widget.data)
          DropdownMenuItem(
            child: Text(item["nom"]),
            value: item["nom"],
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
