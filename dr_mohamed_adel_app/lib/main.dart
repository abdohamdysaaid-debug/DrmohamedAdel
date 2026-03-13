import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {

  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Dr Mohamed Adel',
      home: LessonsPage(),
    );
  }
}

class LessonsPage extends StatefulWidget {

  const LessonsPage({super.key});

  @override
  LessonsPageState createState() => LessonsPageState();
}

class LessonsPageState extends State<LessonsPage> {

  List lessons = [];

  Future getLessons() async {

    var response = await http.get(
        Uri.parse("http://drmohamedadel.test/api/lessons"));

    var data = json.decode(response.body);

    setState(() {
      lessons = data;
    });
  }

  @override
  void initState() {
    super.initState();
    getLessons();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("الدروس"),
      ),
      body: ListView.builder(
        itemCount: lessons.length,
        itemBuilder: (context, index) {
          return ListTile(
            title: Text(lessons[index]['title']),
            subtitle: Text("الفصل: ${lessons[index]['chapter']}"),
          );
        },
      ),
    );
  }
}