var questionTest = {
	text: "Question Text1",
	type: "text",
	template: '',
	answer: "",
	required: false,
	sensitive: false,
	multiInputOptions: []
};

var questionTest2 = {
	text: "Request Format",
	type: "radio",
	template: '<fieldset>' +
		'<input type="radio" id="option-1" name="request_format" value="photography" checked>' +
		'<label for="option-1">Photography</label>' +
		'<input type="radio" id="option-2" name="request_format" value="sharepoint site request">' +
		'<label for="option-2">Sharepoint Site Request</label>' +
		'<input type="radio" id="option-3" name="request_format" value="intranet site">' +
		'<label for="option-3">Intranet Site</label>' +
		'</fieldset>'
	,
	answer: "",
	required: false,
	sensitive: false,
	multiInputOptions: []
};

var questionTest3 = {
	text: "Question Text3",
	type: "text",
	template: '<input type="text"/>'
	,
	answer: "",
	required: false,
	sensitive: false,
	multiInputOptions: []
};

var test = {
	id: 1,
	title: "test title",
	description: "test description",
	editFormOpen: true,
	questions: [questionTest2, questionTest3],
	rawQuestions: []
};

var mockForm = {
	name: 'Public Affairs Action Request',
	description: 'To request photos, Sharepoint, intranet, PAO action.'
};

var FormEditorStore = {
	state: {
		form: mockForm,
		sections: []
	},
	addSection: function(newSection) {
		this.state.sections.push(newSection);
	},
	removeSectionById: function(id) {
		var idx = this.getSectionIndex(id);

		if (idx !== -1) {
			this.state.sections.splice(idx, 1);
		}
	},
	removeSection: function(index) {
		this.state.sections.splice(index, 1);
	},
	getSectionIndex: function(id) {
		return this.state.sections.findIndex(function(element) {
			return element.id === id;
		});
	},
	getSectionById: function(id) {
		var idx = this.getSectionIndex(id);

		if (idx === -1) {
			return {};
		}

		return this.state.sections[idx];
	},
	getQuestionIndex: function(section, questionId) {
		return section.questions.findIndex(function(element) {
			return element.id === questionId;
		});
	},
};