// Let's debug this monster

document.addEventListener('DOMContentLoaded', function() {
    const addRadioQuestionBtn = document.getElementById('add-radio-question-btn');
    const addCheckboxQuestionBtn = document.getElementById('add-checkbox-question-btn');
    const addTextQuestionBtn = document.getElementById('add-text-question-btn');
    const questionsContainer = document.getElementById('questions-container');
    let questionCounter = 1;
    let answerCounter = 1;

    addRadioQuestionBtn.addEventListener('click', function() {
        addQuestion('radio');
    });

    addCheckboxQuestionBtn.addEventListener('click', function() {
        addQuestion('checkbox');
    });

    addTextQuestionBtn.addEventListener('click', function() {
        addQuestion('text');
    });

    function addQuestion(type) {
        let questionNumber = questionCounter;

        const questionDiv = document.createElement('div');
        questionDiv.classList.add('form-group');

        const questionLabel = document.createElement('label');
        questionLabel.innerHTML = `${type} question`;

        const questionInput = document.createElement('input');
        questionInput.setAttribute('type', 'text');
        questionInput.setAttribute('class', 'form-control');
        questionInput.setAttribute('name', `question[${questionNumber}]`);
        questionInput.setAttribute('placeholder', 'Enter your question');

        const questionTypeInput = document.createElement('input');
            questionTypeInput.setAttribute('type', 'hidden');
            questionTypeInput.setAttribute('name', `question_type[${questionNumber}]`);
            questionTypeInput.setAttribute('value', type);

        let addAnswerBtn = '';
        if (type !== 'text') {
            addAnswerBtn = createButton('Add answer', function() {
                addAnswer(questionDiv, questionNumber);
            });
        }

        const deleteQuestionBtn = createButton('Delete question', function() {
            deleteQuestion(questionDiv);
        });

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
        answerInput.setAttribute('placeholder', 'Enter an answer');

        answerCounter++;

        const deleteAnswerBtn = createButton('Delete answer', function() {
            deleteAnswer(questionDiv, answerInput);
        });

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

    function createButton(text, clickHandler) {
        const linkButton = document.createElement('button');
        linkButton.setAttribute('type', 'button');
        linkButton.setAttribute('class', 'btn btn-primary');
        linkButton.innerHTML = text;
        linkButton.addEventListener('click', function() {
            clickHandler();
        });
        return linkButton;
    }
});
