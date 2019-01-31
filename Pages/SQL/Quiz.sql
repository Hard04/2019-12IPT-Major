SELECT 
		qt.quizTopicName AS Topic,
		qq.quizquestionsID AS QnNO,
		qq.quizquestion AS Question,
		qa.quizAnswerID AS AnNO,
		qa.quizAnswer AS Answer,
		qa.quizAnswerCorrectFlag AS CORRECT
FROM
		quiztopic AS qt,	quizquestions AS qq,	quizanswers AS qa
WHERE 
		qt.quizActiveFlag = "Y"
AND 	qq.quizTopicID = qt.quizTopicID
AND	qa.quizquestionsID = qq.quizquestionsID
AND	qa.quizAnswerCorrectFlag = "Y"
ORDER BY
		qt.quizTopicID DESC,
		QnNO,
		qa.quizAnswerCorrectFlag DESC	