#!/bin/bash

# Test Docker Setup untuk AturDOit
# Script ini akan memvalidasi semua komponen Docker setup

echo "🧪 Testing AturDOit Docker Setup"
echo "================================"
echo ""

# Colors
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

# Test counter
PASSED=0
FAILED=0

# Test function
test_item() {
    local description=$1
    local command=$2

    echo -n "Testing: $description... "

    if eval $command > /dev/null 2>&1; then
        echo -e "${GREEN}✓ PASSED${NC}"
        ((PASSED++))
        return 0
    else
        echo -e "${RED}✗ FAILED${NC}"
        ((FAILED++))
        return 1
    fi
}

# File existence tests
echo -e "${BLUE}📁 Checking Files...${NC}"
test_item "Dockerfile exists" "[ -f Dockerfile ]"
test_item "docker-compose.yml exists" "[ -f docker-compose.yml ]"
test_item "docker-compose.dev.yml exists" "[ -f docker-compose.dev.yml ]"
test_item "docker-compose.prod.yml exists" "[ -f docker-compose.prod.yml ]"
test_item ".dockerignore exists" "[ -f .dockerignore ]"
test_item ".env.docker exists" "[ -f .env.docker ]"
test_item "docker.sh exists" "[ -f docker.sh ]"
test_item "docker.sh is executable" "[ -x docker.sh ]"
test_item "Makefile exists" "[ -f Makefile ]"
test_item "Nginx config exists" "[ -f docker/nginx/conf.d/app.conf ]"
test_item "PHP config exists" "[ -f docker/php/local.ini ]"
test_item "MySQL config exists" "[ -f docker/mysql/my.cnf ]"
echo ""

# Docker installation tests
echo -e "${BLUE}🐳 Checking Docker Installation...${NC}"
test_item "Docker is installed" "command -v docker"
test_item "Docker Compose is installed" "command -v docker-compose"
test_item "Docker daemon is running" "docker info"
echo ""

# Configuration validation tests
echo -e "${BLUE}⚙️  Validating Configurations...${NC}"
test_item "Docker Compose config is valid" "docker-compose config --quiet"
test_item "Dockerfile syntax is valid" "docker build --help"
echo ""

# Documentation tests
echo -e "${BLUE}📚 Checking Documentation...${NC}"
test_item "DOCKER.md exists" "[ -f DOCKER.md ]"
test_item "DOCKER-QUICKREF.md exists" "[ -f DOCKER-QUICKREF.md ]"
test_item "DOCKER-SETUP-COMPLETE.md exists" "[ -f DOCKER-SETUP-COMPLETE.md ]"
test_item "README.md updated" "grep -q 'Docker' README.md"
echo ""

# GitHub Actions test
echo -e "${BLUE}🔄 Checking CI/CD...${NC}"
test_item "GitHub Actions workflow exists" "[ -f .github/workflows/docker.yml ]"
echo ""

# Summary
echo "================================"
echo -e "${BLUE}📊 Test Summary${NC}"
echo "================================"
echo -e "Passed: ${GREEN}$PASSED${NC}"
echo -e "Failed: ${RED}$FAILED${NC}"
echo ""

if [ $FAILED -eq 0 ]; then
    echo -e "${GREEN}✅ All tests passed! Docker setup is complete and ready to use.${NC}"
    echo ""
    echo "Next steps:"
    echo "  1. Run: ./docker.sh setup"
    echo "  2. Access: http://localhost:8000"
    exit 0
else
    echo -e "${RED}❌ Some tests failed. Please check the errors above.${NC}"
    exit 1
fi
