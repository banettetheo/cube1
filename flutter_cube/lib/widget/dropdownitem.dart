import 'package:flutter/material.dart';

class DropdownItemWidget extends StatefulWidget {
  final List data;
  final ValueChanged<Object?>? onChanged;

  const DropdownItemWidget({
    Key? key,
    required this.data,
    required this.onChanged,
  }) : super(key: key);

  @override
  _DropdownItemState createState() => _DropdownItemState();
}

class _DropdownItemState extends State<DropdownItemWidget> {
  var selectedValue;

  @override
  void initState() {
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return DropdownButtonFormField(
      menuMaxHeight: 200.0,
      value: selectedValue,
      items: [
        for (var item in widget.data)
          DropdownMenuItem(
            child: Text(item["nom"]),
            value: item["id"],
          )
      ],
      onChanged: widget.onChanged,
    );
  }
}
