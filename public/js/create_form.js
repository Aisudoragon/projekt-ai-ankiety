let addRadioQuestionBtn;
let addCheckboxQuestionBtn;
let addTextQuestionBtn;
let questionsContainer;
let questionCounter = 1;
let answerCounter = 1;

document.addEventListener('DOMContentLoaded', function() {
    addRadioQuestionBtn = document.getElementById('add-radio-question-btn');
    addCheckboxQuestionBtn = document.getElementById('add-checkbox-question-btn');
    addTextQuestionBtn = document.getElementById('add-text-question-btn');
    questionsContainer = document.getElementById('questions-container');
    addRadioQuestionBtn.addEventListener('click', function() {
        addQuestion('radio');
    });

    addCheckboxQuestionBtn.addEventListener('click', function() {
        addQuestion('checkbox');
    });

    addTextQuestionBtn.addEventListener('click', function() {
        addQuestion('text');
    });
});

function addQuestion(type) {
    let questionNumber = questionCounter;

    const questionDiv = document.createElement('div');
    questionDiv.classList.add('form-group');

    const questionLabel = document.createElement('label');
    questionLabel.setAttribute('class', 'give-space-for-lbl')
    questionLabel.innerHTML = `${type} question`;

    const questionInput = document.createElement('input');
    questionInput.setAttribute('type', 'text');
    questionInput.setAttribute('class', 'form-control');
    questionInput.setAttribute('name', `question[${questionNumber}]`);
    questionInput.setAttribute('maxlength', '200')
    questionInput.setAttribute('placeholder', 'Enter your question');
    questionInput.required = true;

    const questionTypeInput = document.createElement('input');
        questionTypeInput.setAttribute('type', 'hidden');
        questionTypeInput.setAttribute('name', `question_type[${questionNumber}]`);
        questionTypeInput.setAttribute('value', type);

    let addAnswerBtn = '';
    if (type !== 'text') {
        addAnswerBtn = createButton('Add answer', function() {
            addAnswer(questionDiv, questionNumber);
        }, 'btn-success');
    }

    const deleteQuestionBtn = createButton('Delete question', function() {
        deleteQuestion(questionDiv);
    }, 'btn-danger');

    questionDiv.appendChild(questionLabel);
    questionDiv.appendChild(questionInput);
    questionDiv.appendChild(questionTypeInput);
    if (type !== 'text') {
        questionDiv.appendChild(addAnswerBtn);
    }
    questionDiv.appendChild(deleteQuestionBtn);
    questionsContainer.appendChild(questionDiv);

    questionCounter++;
}

function addAnswer(questionDiv, questionNumber) {
    const answerInput = document.createElement('input');
    answerInput.setAttribute('type', 'text');
    answerInput.setAttribute('class', 'form-control');
    answerInput.setAttribute('name', `answer[${questionNumber}][]`);
    answerInput.setAttribute('maxlength', '200')
    answerInput.setAttribute('placeholder', 'Enter an answer');
    answerInput.required = true;

    answerCounter++;

    const deleteAnswerBtn = createButton('Delete answer', function() {
        deleteAnswer(questionDiv, answerInput);
    }, 'btn-danger');

    const answerContainer = document.createElement('div');
    answerContainer.appendChild(answerInput);
    answerContainer.appendChild(deleteAnswerBtn);
    questionDiv.appendChild(answerContainer);
}

function deleteQuestion(questionDiv) {
    questionsContainer.removeChild(questionDiv);
}

function deleteAnswer(questionDiv, answerInput) {
    questionDiv.removeChild(answerInput.parentNode);
}

function createButton(text, clickHandler, color) {
    const linkButton = document.createElement('button');
    linkButton.setAttribute('type', 'button');
    linkButton.setAttribute('class', `btn ${color} give-space-for-btn`);
    linkButton.innerHTML = text;
    linkButton.addEventListener('click', function() {
        clickHandler();
    });
    return linkButton;
}
