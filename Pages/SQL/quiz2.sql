SELECT 
		qt.quizTopicName AS Topic,
		qq.quizquestion AS Question,
		qa.quizAnswer AS Answer

FROM 
		quiztopic AS qt, quizquestions AS qq, quizanswers AS qa

WHERE
/* JOIN TABLES */
		qt.quizActiveFlag = "Y"
AND 	qq.quizTopicID = qt.quizTopicID
AND	qa.quizquestionsID = qq.quizquestionsID
/* FILTER */
AND	qa.quizAnswerCorrectFlag = "Y"
AND	qt.quizActiveFlag = "Y"
/*AND	qq.quizquestion LIKE "%f%"*/
AND	qq.quizquestion LIKE "%p_o%"

ORDER BY 
		qt.quizTopicID DESC,
		qa.quizAnswerCorrectFlag DESC	