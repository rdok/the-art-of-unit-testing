pipeline {
    agent { label 'linux' }
    environment { AUTHOR_EMAIL = "${sh(returnStdout: true,script: 'git show -s --format="%ae" HEAD | sed "s/^ *//;s/ *$//"')}" }
    stages{
        stage('Build') { steps { sh 'docker run --rm -v $PWD:/app composer install' } }
        stage('Test') { steps { sh 'docker run --rm -v $PWD:/app -w /app php:7.2-cli ./vendor/bin/phpunit --testdox-html testdox/index.html' } }
    }
    post {
        failure {
            emailext attachLog: true, compressLog: true, to: "${AUTHOR_EMAIL}",
                body: """<p>View console output at <a href='${env.BUILD_URL}/console'>
            ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}</a></p>""",
                subject: "Failure - ${env.JOB_BASE_NAME}:#${env.BUILD_NUMBER}"
            slackSend color: '#FF0000',
                message: "@here Failed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }
        fixed {
            emailext subject: "Fixed - ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}", to: "${AUTHOR_EMAIL}",
                body: "<p><a href='${env.BUILD_URL}/console'>View ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}</a></p>",
            slackSend color: 'good',
                message: "@here Fixed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }
        success { slackSend message: "Stable: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>" }
        always {
            publishHTML([allowMissing: false, alwaysLinkToLastBuild: true, keepAll: false,
             reportDir: 'testdox', reportFiles: 'index.html', reportName: 'HTML Report', reportTitles: ''])
        }
    }
}