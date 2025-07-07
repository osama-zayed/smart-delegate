CollectionReference volunteer = FirebaseFirestore.instance.collection('volunteer');
  List<VolunteerModel> volunteerList = [];
  void getAllVolunteers() async {
    emit(HomeLoadingDataState());
    try {
      final querySnapshot = await volunteer.get();
      volunteerList = querySnapshot.docs.map((doc) {
        final id = doc.id;
        final data = doc.data() as Map<String, dynamic>;
        return VolunteerModel.fromJson(id, data);
      }).toList();
      emit(HomeSuccessDataState());
    } catch(e) {
      emit(HomeErrorDataState(e.toString()));
      print(e.toString());
    }
  }