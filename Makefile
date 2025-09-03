DOCKER=docker-compose

up:
	$(DOCKER) up -d

stop:
	$(DOCKER) stop