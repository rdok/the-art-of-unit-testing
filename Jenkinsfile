pipeline {
    agent { label 'linux' }
    environment {
        AUTHOR_EMAIL = """${sh(
            returnStdout: true,
            script: 'git show -s --format="%ae" HEAD | sed "s/^ *//;s/ *$//"'
        )}"""
    }
    stages{
        stage('Build') {
            steps { sh 'docker run --rm -v $PWD:/app composer install' }
        }
        stage('Test') {
            steps { sh 'docker run --rm -v $PWD:/app -w /app php:7.2-cli ./vendor/bin/phpunit --testdox-html testdox/index.html' }
        }
    }
    post {
        failure {
            emailext attachLog: true,
                body: """<p>View console output at <a href='${env.BUILD_URL}/console'>
                    ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}</a></p>
                    """,
                compressLog: true,
                subject: "${currentBuild.result?:'SUCCESS'} - ${env.JOB_BASE_NAME}:#${env.BUILD_NUMBER}",
                to: "${AUTHOR_EMAIL}"
        }
        fixed {
            emailext attachLog: true,
                body: """<p>View console output at <a href='${env.BUILD_URL}/console'>
                    ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}</a></p>
                    """,
                compressLog: true,
                subject: "${currentBuild.result?:'FIXED'} - ${env.JOB_BASE_NAME}:#${env.BUILD_NUMBER}",
                to: "${AUTHOR_EMAIL}"
        }
        always {
            publishHTML([allowMissing: false, alwaysLinkToLastBuild: true, keepAll: false, reportDir: 'testdox', reportFiles: 'index.html', reportName: 'HTML Report', reportTitles: ''])
        }
    }
}

